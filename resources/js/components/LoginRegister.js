import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

class LoginRegister extends React.Component{

    onLogout(e) {
        e.preventDefault();

        axios.post('/logout').then(res => {
        	setTimeout(() => {
        		window.location = window.location.href;
        	}, 500);
        })
        .catch(err => console.log(err));

        e.target.innerHTML = "Logging out...";
    }

    render() {        
        return (

        );
    }
}

export default LoginRegister;

if (document.getElementById('logout')) {
    ReactDOM.render(<LoginRegister />, document.getElementById('logout'));
}
