import React from 'react';
import ReactDOM from 'react-dom';
import Cleave from 'cleave.js/react';
import moment from 'moment';

class BorrowBook extends React.Component{

    constructor(props) {
        super(props);

        // Bind
        this.onsubmit = this.onsubmit.bind(this);
    }

    onsubmit(e) {
        e.preventDefault();

        let today = moment();
        let startDate = moment(e.target[2].value).diff(today, 'days');
        let bookingDays = moment(e.target[3].value).diff(e.target[2].value, 'days');

        // Check previouse date selection
        if (startDate < 0) {
            return Swal.fire({
                title: 'Error!',
                text: 'You can not select previous dates',
                icon: 'error',
                confirmButtonText: 'Okay'
            })
        }
        
        // Check booking days
        if (bookingDays > 7) {
            return Swal.fire({
                title: 'Error!',
                text: 'You have selected invalid days',
                icon: 'error',
                confirmButtonText: 'Okay'
            })
        }

        axios.post('/books/borrow', new FormData(e.target)).then(res => {
            Swal.fire({
                title: res.data.success ? 'Success' : 'Error!',
                text: res.data.message,
                icon: res.data.success ? 'success' : 'error',
                confirmButtonText: 'Okay'
            })
                    
        }).catch(err => {
            // Get errors
            let errors = err.response.data.errors;

            if (!_.isEmpty(errors)) {
                Swal.fire({
                    title: 'Error!',
                    text: _.values(errors)[0][0],
                    icon: 'error',
                    confirmButtonText: 'Okay'
                });
            }

        });
    }

    render() {

        const today = moment().format('M')+'/'+moment().format('D')+'/'+moment().format('Y'); 

        return (
            <React.Fragment>
                <form action="#" className="search-destination" autoComplete="off" onSubmit={this.onsubmit}>
                    <div className="row">
                        <div className="col-md align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">ISBN</label>
                                <div className="form-field">
                                    <div className="icon"><span className="icon-barcode"></span></div>
                                    <Cleave name="isbn" className="form-control" options={{ blocks: [3, 1, 5, 3, 1], delimiter: '-' }} placeholder="ISBN" />
                                </div>
                            </div>
                        </div>
                        <div className="col-md align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Title</label>
                                <div className="form-field">
                                    <div className="icon"><span className="ion-ios-journal"></span></div>
                                    <input type="text" name="title" className="form-control" placeholder="Title" />
                                </div>
                            </div>
                        </div>
                        <div className="col-md align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">From</label>
                                <div className="form-field">
                                    <div className="icon"><span className="icon-calendar"></span></div>
                                    <input 
                                        type="text"
                                        name="from" 
                                        className="form-control checkin_date" 
                                        placeholder="From" />
                                </div>
                            </div>
                        </div>
                        <div className="col-md align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Return</label>
                                <div className="form-field">
                                    <div className="icon"><span className="icon-calendar"></span></div>
                                    <input 
                                        type="text" 
                                        name="return" 
                                        className="form-control checkin_date"
                                        placeholder="Return" />
                                </div>
                            </div>
                        </div>
                        <div className="col-md align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Available</label>
                                <div className="form-field">
                                    <div className="select-wrap">
                                        <div className="icon"><span className="ion-ios-checkbox"></span></div>
                                        <select name="" id="" name="availability" className="form-control">
                                            <option>Yes</option>
                                            <option>No</option>
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

export default BorrowBook;

if (document.getElementById('borrow-book')) {
    ReactDOM.render(<BorrowBook />, document.getElementById('borrow-book'));
}
