import React from 'react';
import ReactDOM from 'react-dom';
import BorrowBookExpanded from './BorrowBookExpanded';

class Booking extends React.Component{

    constructor(props) {
        super(props);

        // Binding
        this.switch = this.switch.bind(this);
        this.bookingButton = this.bookingButton.bind(this);

        // State
        this.state = {
            bookingBtn: true
        }
    }

    bookingButton() {

        const borderStyle = {borderRadius: '2px'};

        return (
            <button className="btn btn-primary py-2 px-4" style={borderStyle} onClick={this.switch}>
                Reserve date
            </button>
        );
    }

    bookingForm() {

        const borderStyle = {borderRadius: 0};
        const paddingStyle = {padding: '5px'};

        return (
            <div className="card" style={borderStyle}>
                <span className="card-header text-center" style={paddingStyle}>Booking information</span>
                <div className="card-body">
                    <BorrowBookExpanded />
                </div>
            </div>
        );
    }

    switch(e) {
        this.setState({ bookingBtn: false });
    }

    render() {        
        return this.state.bookingBtn && this.bookingButton() || this.bookingForm();
    }
}

export default Booking;

if (document.getElementById('booking')) {
    ReactDOM.render(<Booking />, document.getElementById('booking'));
}
