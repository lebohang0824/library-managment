import React from 'react';

class StoreBook extends React.Component {

	constructor(props) {
		super(props)

		// Private properties
        this.stars = [0,1,2,3,4];
		this.bookPreviewImage = {'backgroundImage': 'url('+this.props.book.image+')'};
	}

	render() {
		return (
			<div className="col-sm col-md-6 col-lg-4">
    		    <div className="destination">
    	            <div className="img img-2 d-flex justify-content-center align-items-center" style={ this.bookPreviewImage }></div>
                    <div className="text p-3">
                        <div className="d-flex">
                            <div className="one">
                                <h3>{this.props.book.author}</h3>
                                <p className="rate">
                                    { this.stars.map(n => (n < Math.ceil(this.props.book.stars / 2)) && 
                                        <i key={n} className="icon-star"></i> || 
                                        <i key={n} className="icon-star-o"></i>) 
                                    } 
                                    <span>{ this.props.book.stars } Rating</span>
                                </p>
                            </div>
                            { this.props.book.booked == 1 && (
                            	<div className="two">
    				                <span className="book not-available">
    				                    <span className="icon-circle"></span>
                                    </span>
    				            </div>
                            ) || (
                            	<div className="two">
    				                <span className="book available">
    				                    <span className="icon-circle"></span>
                                    </span>
    				            </div>
                            )}
                        </div>
                        <p>{this.props.book.title}</p><hr />
                        <p className="bottom-area d-flex">
                            <span><i className="icon-folder-o"></i> { this.props.book.category }</span> 
                            <span className="ml-auto">
                            	<a href={ 'books/' + this.props.book.ref  }>
                            		{ this.props.book.booked == 1 && 'Details' || 'Take & Return' }
                            	</a>
                            </span>
                        </p>
                    </div>
    	        </div>
	        </div>
		)
	}
}

export default StoreBook;