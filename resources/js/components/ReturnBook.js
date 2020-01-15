import React from 'react';
import ReactDOM from 'react-dom';
import Cleave from 'cleave.js/react';

class ReturnBook extends React.Component{

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
								<label htmlFor="#">ISBN</label>
								<div className="form-field">
									<div className="icon"><span className="icon-barcode"></span></div>
                                    <Cleave className="form-control" options={{ blocks: [3, 1, 5, 3, 1], delimiter: '-' }} placeholder="ISBN" />
								</div>
							</div>
						</div>
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Rate</label>
								<div className="form-field">
									<div className="icon"><span className="icon-star"></span></div>
										<select name="" id="" className="form-control">
											<option value="1">1 Star</option>
											<option value="2">2 Stars</option>
											<option value="3">3 Stars</option>
											<option value="4">4 Stars</option>
											<option value="5">5 Stars</option>
										</select>
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
						<div className="col-md align-items-end">
							<div className="form-group">
								<label htmlFor="#">Did you enjoy?</label>
								<div className="form-field">
									<div className="select-wrap">
										<div className="icon"><span className="ion-ios-checkbox"></span></div>
										<select name="" id="" className="form-control">
											<option value="">Yes</option>
											<option value="">No</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div className="col-md align-self-end">
							<div className="form-group">
								<div className="form-field">
									<input type="submit" value="Submit" className="form-control btn btn-primary" />
								</div>
							</div>
						</div>
					</div>
                </form>
            </React.Fragment>
        );
    }
}

export default ReturnBook;

if (document.getElementById('return-book')) {
    ReactDOM.render(<ReturnBook />, document.getElementById('return-book'));
}
