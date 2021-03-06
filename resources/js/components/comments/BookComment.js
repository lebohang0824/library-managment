import React from 'react';

class BookComment extends React.Component{
    render() {
        return (
            <div className="item">
                <div className="testimony-wrap p-4 pb-0 text-dark border-bottom">
                    <div className="text">
                        <p className="mb-1">{ this.props.comment.body }</p>
                        <p className="name">{ this.props.comment.user.surname } { this.props.comment.user.name }</p>
                        <span className="position"><span className="icon icon-calendar"></span> 01/01/2020</span>
                    </div>
                </div>
            </div>
        );
    }
}

export default BookComment;
