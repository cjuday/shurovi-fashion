import PropTypes from "prop-types";
import React from 'react';
import ReactVivus from 'react-vivus';

const ServBox = ({ data, classOption }) => {
    return (
        <div className={`icon-box serv text-center ${classOption}`}>
            <div className="icon">
                <img src={data.img} className="service-icon"/>
            </div>
            <div className="content">
                <div className="desc">
                    <p>{data.details}</p>
                </div>
            </div>
        </div>
    )
}

ServBox.propTypes = {
    data: PropTypes.object,
    classOption: PropTypes.string
};

ServBox.defaultProps = {
    classOption: "icon-box text-center",
};

export default ServBox;
