import React from 'react'
import PropTypes from "prop-types";

const Product =  ({data}) => {
    return (
        <div className="product-section" style={{backgroundImage: `url(${data})`}}>

            <div className="container">
                <div className="row">

                    <div className="col align-self-center">
                        
                    </div>

                </div>
            </div>

        </div>
        
    )
}

Product.propTypes = {
    data: PropTypes.string
};
  

export default Product
