import React from 'react';
import PropTypes from "prop-types";

const WorkItem = ({ portfolio }) => {
    return (
        <div key={portfolio.id} className="col mb-6" data-aos="fade-up" data-aos-delay="300">
            <a href={`${portfolio.link}`}>
                <img src={portfolio.img1} className="img-fluid port"
                    onMouseOver={e => (e.currentTarget.src = portfolio.img2)}
                     onMouseOut={e => (e.currentTarget.src =portfolio.img1)}/>
            </a>
        </div>
    )
}

WorkItem.propTypes = {
    portfolio: PropTypes.object
};

export default WorkItem;
