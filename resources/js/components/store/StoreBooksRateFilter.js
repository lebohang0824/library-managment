import React from 'react';

class StoreBooksRateFilter extends React.Component {

	render() {
		return (
			<div className="sidebar-wrap ftco-animate">
                <h3 className="heading mb-4">Filter by Rating</h3>
                <form method="post" className="star-rating">
                    <div className="form-check">
                        <input type="radio" name="rated" 
                            onChange={this.props.onCheck} data-check="9" className="form-check-input" id="ck1" />
                        <label className="form-check-label" htmlFor="ck1">
                            <p className="rate">
                            	<span>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            	</span>
                            </p>
                        </label>
                    </div>
                    <div className="form-check">
                        <input type="radio" name="rated" 
                            onChange={this.props.onCheck} data-check="7" className="form-check-input" id="ck2" />
                        <label className="form-check-label" htmlFor="ck2">
                            <p className="rate">
                             	<span>
                             		<i className="icon-star"></i>
                             		<i className="icon-star"></i>
                             		<i className="icon-star"></i>
                             		<i className="icon-star"></i>
                             		<i className="icon-star-o"></i>
                             	</span>
                            </p>
                        </label>
                    </div>
                    <div className="form-check">
                        <input type="radio" name="rated" 
                            onChange={this.props.onCheck} data-check="5" className="form-check-input" id="ck3" />
                        <label className="form-check-label" htmlFor="ck3">
                            <p className="rate">
                            	<span>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            	</span>
                            </p>
                     </label>
                    </div>
                    <div className="form-check">
                        <input type="radio" name="rated" 
                            onChange={this.props.onCheck} data-check="3" className="form-check-input" id="ck4" />
                        <label className="form-check-label" htmlFor="ck4">
                            <p className="rate">
                            	<span>
                            		<i className="icon-star"></i>
                            		<i className="icon-star"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            	</span>
                            </p>
                        </label>
                    </div>
                    <div className="form-check">
                        <input type="radio" name="rated" 
                            onChange={this.props.onCheck} data-check="1" className="form-check-input" id="ck5" />
                        <label className="form-check-label" htmlFor="ck5">
                            <p className="rate">
                            	<span>
                            		<i className="icon-star"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            		<i className="icon-star-o"></i>
                            	</span>
                            </p>
                        </label>
                    </div>
                </form>
            </div>
		);
	}
}

export default StoreBooksRateFilter;