import React from 'react';
import ReactDOM from 'react-dom';
import Cleave from 'cleave.js/react';

class RegisterBook extends React.Component{

    constructor(props) {
        super(props);

        // Bind
        this.onsubmit = this.onsubmit.bind(this);
    }

    onsubmit(e) {
        e.preventDefault();

        axios.post('/book/register', new FormData(e.target)).then(res => {
            Swal.fire({
                title: res.data.success ? 'Success' : 'Error!',
                text: res.data.message,
                icon: res.data.success ? 'success' : 'error',
                confirmButtonText: 'Okay'
            }).then(isConfirm => {
                if (isConfirm) {
                    if (res.data.success) window.location = window.location.href;
                }
            });
                    
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

        return (
            <React.Fragment>
                <form action="#" className="search-destination" autoComplete="off" onSubmit={this.onsubmit}>
                    <h3>Register Book</h3>
                    <div className="row">
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">ISBN</label>
                                <div className="form-field">
                                    <div className="icon"><span className="icon-barcode"></span></div>
                                    <Cleave name="isbn" className="form-control" options={{ blocks: [3, 1, 5, 3, 1], delimiter: '-' }} placeholder="ISBN" />
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Title</label>
                                <div className="form-field">
                                    <div className="icon"><span className="ion-ios-journal"></span></div>
                                    <input type="text" name="title" className="form-control" placeholder="Title" />
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Author</label>
                                <div className="form-field">
                                    <div className="icon"><span className="ion-ios-journal"></span></div>
                                    <input type="text" name="author" className="form-control" placeholder="Author" />
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Category</label>
                                <div className="form-field">
                                    <div className="select-wrap">
                                        <div className="icon"><span className="ion-ios-checkbox"></span></div>
                                        <select name="category" className="form-control">
                                            <option>General</option>
                                            <option>Programming</option>
                                            <option>Business</option>
                                            <option>Design</option>
                                            <option>Fictions</option>
                                            <option>Poetry</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <label htmlFor="#">Cover</label>
                                <div className="form-field">
                                    <div className="icon"><span className="ion-ios-journal"></span></div>
                                    <input type="file" name="cover" className="form-control" placeholder="Cover" />
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-items-end">
                            <div className="form-group">
                                <div className="form-field">
                                    <span>
                                        <input type="checkbox" name="terms" className="form-checkbox" placeholder="Terms &amp; Conditions" />
                                        &nbsp; I accept <a href="#">Terms &amp; Conditions</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-12 align-self-end">
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

export default RegisterBook;

if (document.getElementById('register-book')) {
    ReactDOM.render(<RegisterBook />, document.getElementById('register-book'));
}
