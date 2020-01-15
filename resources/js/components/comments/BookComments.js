import React from 'react';
import ReactDOM from 'react-dom';
import BookComment from './BookComment';

class BookComments extends React.Component{

    constructor(props) {
        super(props);

        this.state = {
            comments: []
        }
    }

    componentDidMount() {
        let ref = window.location.href.split('/');

        axios.get(`${ref[4]}/comments`).then(res => {
            this.setState({ comments: res.data });
        }).catch(err => console.log(err));                  
    }

    render() {
        return (
            <React.Fragment>                 
                {this.state.comments.map(comment => <BookComment key={comment} comment={comment} />)}
            </React.Fragment>
        );
    }
}

export default BookComments;

if (document.getElementById('book-comments')) {
    ReactDOM.render(<BookComments />, document.getElementById('book-comments'));
}
