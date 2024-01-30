import React from 'react'
import PropTypes from "prop-types";
import {Link} from "react-router-dom";

const Intro =  ({data}) => {
    return (
        
        <div className="intro-section overlay section" style={{backgroundImage: `url(${data.img})`}}>

            <div className="container">
                <div className="row">

                    <div className="col align-self-center">
                        <div className="intro-content mt-xl-8 mt-lg-8 mt-md-8 mt-sm-8 mt-xs-8" style={{textAlign: `${data.text_align}`}}>
                            <h2 className="title">{data.title}</h2>
                            <h2 className="title2">{data.title_2}</h2>
                            <h2 className="title3">{data.title_3}</h2>
                            <h2 className="title4">{data.title_4}</h2>
                            <Link to={process.env.PUBLIC_URL + "/contact"} className="btn btn-primary btn-hover-secondary">Contact Us</Link>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        
    )
}

Intro.propTypes = {
    data: PropTypes.object
};
  

export default Intro
