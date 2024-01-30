import React from "react";
import PropTypes from "prop-types";

const ItemDetails = ({data}) => {
    return (
        <>
            {data && data.map(dt => {
                return(
                    <div key={1} className="bg-color-1 product-details">
                        <div key={3} className="title">
                            {dt.name}
                        </div>
                        <span key={2} className="info-text" dangerouslySetInnerHTML={{__html: dt.description}}/>
                    </div> 
                )
            })}
        </>
    )
}

ItemDetails.propTypes = {
    data: PropTypes.array,
};

export default ItemDetails;
