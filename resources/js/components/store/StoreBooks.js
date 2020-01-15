import React from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import StoreBook from './StoreBook';
import StoreBooksSearch from './StoreBooksSearch';
import StoreBooksRateFilter from './StoreBooksRateFilter';
import StoreBooksPagenation from './StoreBooksPagenation';

class StoreBooks extends React.Component {

	constructor(props) {
		super(props);

		// Bind
		this.onPagenate = this.onPagenate.bind(this);
		this.onSearch = this.onSearch.bind(this);
		this.onCheck = this.onCheck.bind(this);

		// Properties
		this.getBooks = [];

		// State
		this.state = {
			books: this.getBooks,
			pages: this.getNumOfPages(this.getBooks.length)
		}
	}

	componentDidMount() {
		axios.get('/books/all').then(res => {
			this.getBooks = res.data;

			this.setState({
				books: this.getBooks,
				pages: this.getNumOfPages(this.getBooks.length)
			});

			this.filteredBooks = this.getBooks;
		});		
	}

	getNumOfPages(len) {
		let pages = [];

		// Get number of pages
		for (let i = 0; i < len / 6; i++) {
			pages.push(i);
		}

		return pages;
	}

	onPagenate(e) {
		e.preventDefault();

		let books = this.filteredBooks;
		let n = parseInt(e.target.innerHTML);

		n = (n -1) * 6;

		// Update state
		this.setState({
			books: books.slice(n)
		});

		// Start view from top
		window.scroll({
  			top: 0,
  			left: 0,
  			behavior: 'smooth'
		});

		this.activatePage(e.target);
	}

	onSearch(e) {
		e.preventDefault();

		let val = e.target[0].value;
		let books = this.filteredBooks;

		// Books found
		books = books.filter(book => book.title.includes(val) || book.author.includes(val))

		// Update state
		this.setState({
			books: books,
			pages: this.getNumOfPages(books.length)
		});

		this.filteredBooks = books;

		// Reset
		this.activatePage(null);
	}

	onCheck(e) {
		let n = parseInt(e.target.getAttribute('data-check'));

        let books = this.getBooks;
        books = books.filter(book => book.stars >= n);

        // Update state
		this.setState({
			books: books,
			pages: this.getNumOfPages(books.length)
		});

		this.filteredBooks = books;

		// Reset
		this.activatePage(null);
	}

    activatePage(el) {
        let list = document.getElementById('list');

        list.childNodes.forEach(child => {
            child.classList.remove('active');
        });

        if (el == null) {
            list.childNodes[1].classList.add('active');
        } else {
            el.parentNode.classList.add('active');
        }       
    }

	render() {
		return (
			<section className="ftco-section">
                <div className="container">
                    <div className="row mt-lg-5">
                        <div className="col-lg-3 sidebar order-md-last ftco-animate">
                            <StoreBooksSearch onSearch={this.onSearch} />
                            <StoreBooksRateFilter onCheck={this.onCheck} />
                        </div>
                        <div className="col-lg-9">
                            <div className="row">
                                {this.state.books.map(book => <StoreBook key={book.image} book={book} />).slice(0, 6)}
                            </div>          
                        </div>
                    </div>
                    <StoreBooksPagenation pages={this.state.pages} onPagenate={this.onPagenate} />
                </div>
            </section>
		);
	}
}

export default StoreBooks;

if (document.getElementById('books')) {
    ReactDOM.render(<StoreBooks />, document.getElementById('books'));
}