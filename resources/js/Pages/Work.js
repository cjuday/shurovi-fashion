import React, {useState, useEffect} from 'react';
import SEO from '../components/SEO';
import Header from "../partials/header/Header";
import Breadcrumb from '../container/Breadcrumb/Breadcrumb';
import Category from '../container/Category/Category';
import Footer from '../container/Footer/Footer';
import ScrollToTop from '../components/ScrollToTop.jsx';


const Work = () => {
    const [cover, setCover] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/covers/2")
            .then((response) => response.json())
            .then((data) => {
                setCover(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);

    return (
        <React.Fragment>
            <SEO title="Our Products" />
            <Header />
            <Breadcrumb
                image={cover.src}
                title={cover.title}
                content="Home"
                contentTwo="Products"
            />
            <Category/>
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

export default Work;
