import PropTypes from "prop-types";
import React from 'react';
import {Link} from "react-router-dom";

const Brand = ({ data }) => {
    return (
        <div className="brand">
            <Link to={process.env.PUBLIC_URL + "/"}>
                <img src={data.img_src} alt="client image" />
            </Link>
        </div>
    )
}

Brand.propTypes = {
    data: PropTypes.object
}



export default Brand;
