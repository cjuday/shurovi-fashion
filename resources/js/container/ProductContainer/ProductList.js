import React, {useState, useEffect} from "react";
import { useParams } from "react-router-dom";
import { Link } from "react-router-dom";
import ClipLoader from 'react-spinners/ClipLoader';

const ProductList = () => {
    const {subCat} = useParams();
    const {catName} = useParams();
    const [loading, setLoading] = useState(false);
    const [brnData, setbrnData] = useState([]);

    const fetchbrnData = () => {
        setLoading(true);
        return fetch(`https://new.taiammumuday.com/api/products/${catName}_${subCat}`)
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
                setLoading(false);
            });
    }

    useEffect(() => {
        setTimeout(() => {
        }, 20000);
        fetchbrnData();
    },[subCat]);
    
    if(loading){
        return(
            <div className="loader-container">
          <ClipLoader color={'#fff'} size={150} />
        </div>
        )
    }

    return(
        <div className="container-fluid">
            <div className="row row-cols-lg-4 row-cols-md-3 row-cols-1 pt-6 text-center">
                {brnData && brnData.length>0 ? brnData.map((data) => {
                    return(
                        <div key={data.id} className="col mb-6" data-aos="fade-up" data-aos-delay="300">
                            <Link to={`/products/items/${data.slug}`}>
                                <img src={data.image_url} className="prod-img"
                                onMouseOver={e => (e.currentTarget.src = data.image_url2)}
                                onMouseOut={e => (e.currentTarget.src =data.image_url)}/>
                                <h6 className="text-center pt-2 mb-2">{data.name}</h6>
                            </Link>
                        </div>
                    ); 
                }) : <div className="container text-center pb-4 mb-10">
                    <h2>No data has been added for this particular category yet.</h2>
                </div>}
            </div>
        </div>
    )
}

export default ProductList;