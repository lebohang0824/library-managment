import React from 'react';

class StoreBooksPagenation extends React.Component {

	render() {
		return (
			<div className="row mt-2">
                <div className="col text-center">
                    <div className="block-27">
                        <ul id="list">
                            <li><a href="#">&lt;</a></li>
                            {this.props.pages.map((n, i) => (
                                (i === 0) && 
                                <li className="active" key={ n }><a href="#" onClick={ this.props.onPagenate }>{ n +1 }</a></li> ||
                                <li key={ n }><a href="#" onClick={ this.props.onPagenate }>{ n +1 }</a></li>
                            ))}                            
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
		);
	}
}

export default StoreBooksPagenation;