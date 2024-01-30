import React, {useState, useEffect} from "react";
import SEO from '../components/SEO';
import Header from "../partials/header/Header";
import Footer from '../container/Footer/Footer';
import ScrollToTop from '../components/ScrollToTop.jsx';
import ItemImageCoinatiner from "../container/ItemsContainer/ItemImageContainer";
import { useParams } from "react-router-dom";
import ItemDetails from "../container/ItemDetails/ItemDetails";
import CategoryNav from "../components/CategoryNav/CategoryNav";

const ProductDetails = () => {
    const {slug} = useParams();
    const [brnData, setbrnData] = useState([]);

    const fetchbrnData = () => {
        return fetch(`https://new.taiammumuday.com/api/products/${slug}`)
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
            });
    }
    

    useEffect(() => {
        setTimeout(() => {
        }, 20000);
        fetchbrnData();
    });

    return(
        <React.Fragment>
            <SEO title={brnData.name} />
            <Header />
            <CategoryNav/>
            <div className="container">
                <div className="row pt-10">
                    <div className="col-lg-7">
                        <ItemImageCoinatiner data={brnData}/>
                    </div>
                    <div className="col-lg-5">
                        <ItemDetails data={brnData}/>
                    </div>
                </div>
            </div>
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

export default ProductDetails;
