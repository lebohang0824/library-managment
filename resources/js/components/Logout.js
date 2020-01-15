import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

class Logout extends React.Component{

    onLogout(e) {
        e.preventDefault();

        axios.post('/logout').then(res => {
        	setTimeout(() => {
        		window.location = '/'
        	}, 500);
        })
        .catch(err => console.log(err));

        e.target.innerHTML = "Logging out...";
    }

    render() {
        
        const logout = {'fontSize': '13px'};
        
        return (
        	<li className="nav-item">
				<button onClick={ this.onLogout } className="btn btn-primary border-none px-3 py-3" style={ logout }>
					{ username } Logout <span className="icon-lock"></span>
				</button>
			</li>
	    );
    }
}

export default Logout;

if (document.getElementById('logout')) {
    ReactDOM.render(<Logout />, document.getElementById('logout'));
}
