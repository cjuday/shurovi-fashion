import React from "react";
import ProductSlider from "../ProductSlider/ProductSlider";

const ItemImageCoinatiner = ({data}) => {

    const pic = [];

    return(
        <div>
            {data && data.length>0 ? data.map((data) => {
                pic.push(data.image_url);
                pic.push(data.image_url2);
                if(data.image_url3!=''){
                    pic.push(data.image_url3);
                }
                if(data.image_url4!=''){
                    pic.push(data.image_url4);
                }
                if(data.image_url5!=''){
                    pic.push(data.image_url5);
                }
                    return(
                        <div key={data.id} className="mb-6">
                            <ProductSlider data={pic}/>
                        </div>
                    ); 
                }) : <div className="container text-center pb-4 mb-10">
                    <h2>No data has been added for this particular category yet.</h2>
                </div>}
        </div>
    )
}

export default ItemImageCoinatiner;