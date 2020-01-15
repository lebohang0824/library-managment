import React from 'react';
import ReactDOM from 'react-dom';

class RequestBook extends React.Component{

    constructor(props) {
        super(props);

        // Bind
        this.onsubmit = this.onsubmit.bind(this);
    }

    onsubmit(e) {
        e.preventDefault();

        alert('Submitted');
    }

    render() {
        return (
            <React.Fragment>
                <form action="#" className="search-destination" autoComplete="off" onSubmit={this.onsubmit}>
                    <div className="row">
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Title</label>
								<div className="form-field">
									<div className="icon"><span className="ion-ios-journal"></span></div>
									<input type="text" className="form-control" placeholder="Title" />
								</div>
							</div>
						</div>
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Author</label>
								<div className="form-field">
									<div className="icon"><span className="icon-user"></span></div>
									<input type="text" className="form-control" placeholder="Author" />
								</div>
							</div>
						</div>
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Your Email</label>
								<div className="form-field">
									<div className="icon"><span className="icon-envelope"></span></div>
									<input type="text" className="form-control" placeholder="Your Email" />
								</div>
							</div>
						</div>
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Your Full Names</label>
								<div className="form-field">
									<div className="icon"><span className="icon-user"></span></div>
									<input type="text" className="form-control" placeholder="Your Full Names" />
								</div>
							</div>
						</div>
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Comment</label>
								<div className="form-field">
									<div className="icon"><span className="icon-comment"></span></div>
									<input type="text" className="form-control" placeholder="Comment" />
								</div>
							</div>
						</div>
						<div className="col-md align-self-end">
							<div className="form-group">
								<div className="form-field">
									<input type="submit" value="Send Request" className="form-control btn btn-primary" />
								</div>
							</div>
						</div>
					</div>
                </form>
            </React.Fragment>
        );
    }
}

export default RequestBook;

if (document.getElementById('request-book')) {
    ReactDOM.render(<RequestBook />, document.getElementById('request-book'));
}
