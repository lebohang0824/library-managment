import React from 'react';

class StoreBooksSearch extends React.Component {

	render() {
		return (
			<div className="sidebar-wrap ftco-animate">
                <h3 className="heading mb-4">Filter search</h3>
                <form action="#" onSubmit={ this.props.onSearch }>
                    <div className="fields">
                        <div className="form-group">
                            <input type="text" className="form-control" placeholder="Title or Author" />
                        </div>
                        <div className="form-group">
                            <div className="select-wrap one-third">
                                <div className="icon"><span className="ion-ios-arrow-down"></span></div>
                                <select name="" id="" className="form-control" placeholder="Category">
                                    <option value="">All</option>
                                    <option value="">Available</option>
                                    <option value="">Booked</option>
                                </select>
                            </div>
                        </div>
                        <div className="form-group">
                            <input type="submit" value="Search" className="btn btn-primary py-3 px-5" />
                        </div>
                    </div>
                </form>
            </div>
		);
	}
}

export default StoreBooksSearch;