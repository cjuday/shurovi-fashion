import React, {useState, useEffect} from 'react';
import SEO from '../components/SEO';
import Header from "../partials/header/Header";
import Footer from '../container/Footer/Footer';
import ScrollToTop from '../components/ScrollToTop.jsx';
import { Link, useParams } from 'react-router-dom';
import PropTypes from "prop-types";
import ProductList from '../container/ProductContainer/ProductList';


const Items = ({ classOption }) => {
    const {catName} = useParams();
    const {subCat} = useParams();

    const [brnData, setbrnData] = useState([]);
    const [active, setActive] = useState("All");
    const fetchbrnData = async() => {
        return await fetch(`https://new.taiammumuday.com/api/subgroups/${catName}`)
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
            });
    }

    useEffect(() => {
        fetchbrnData();
        setActive(subCat);
    },[]);

    const handleClick = (event) => {
        setActive(event.currentTarget.id);
    }

    var hrd;
    if(subCat==undefined || subCat=='All'){
        hrd = 'All Products';
    }else{
        hrd = subCat;
    }

    function Capitalize(str){
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    return (
        <React.Fragment>
            <SEO title={`${hrd} for ${Capitalize(catName)}`} />
            <Header />
                <h2 className='title title text-center pt-3'>{hrd} for {Capitalize(catName)}</h2>
                <div className={`messonry-button ${classOption}`}>
                    <Link reloadDocument to={`/products/${catName}/All`}>
                        <button id={`All`} className={active === 'All' ? 'is-checked' : ''} onClick={handleClick}><span className="filter-text">All</span></button>
                    </Link>
                    {brnData.map((cat) => 
                        <Link reloadDocument key={cat.id} to={`/products/${catName}/${cat.name}`}>
                            <button id={cat.name} className={active === cat.name ? 'is-checked' : ''} onClick={handleClick}><span className="filter-text">{cat.name}</span></button>
                        </Link>
                    )}
                </div>

                <ProductList/>
            
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

Items.propTypes = {
    categories: PropTypes.array,
    classOption: PropTypes.string
}

Items.defaultProps = {
    classOption: "text-lg-center text-center mb-lg-13 mb-md-13 mb-6"
};

export default Items;
