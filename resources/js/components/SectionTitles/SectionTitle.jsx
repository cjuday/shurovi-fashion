import PropTypes from "prop-types";
import React from 'react';

const SectionTitle = ({ title, subTitle, titleOption, headingOption }) => {
    return (
        <div className={`section-title ${titleOption}`} data-aos="fade-up">
            <h2 className={`title ${headingOption}`} dangerouslySetInnerHTML={{__html: title}}></h2>
            <p className="sub-title text-dark">{subTitle}</p>
        </div>
    )
}

SectionTitle.propTypes = {
    subTitle: PropTypes.string,
    title: PropTypes.string,
    titleOption: PropTypes.string,
    headingOption: PropTypes.string
};
SectionTitle.defaultProps = {
    titleOption: "text-left",
    headingOption: "title"
};

export default SectionTitle;
