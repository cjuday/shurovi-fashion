import React from 'react';
import SEO from '../components/SEO.jsx';
import Header from "../partials/header/Header.jsx";
import IntroSlider from '../container/IntroSlider/IntroSlider.jsx';
import HomeAbout from '../components/About/HomeAbout.jsx';
import ServiceIconBox from '../container/service/ServiceIconBox.jsx';
import Footer from '../container/Footer/Footer.jsx';
import ScrollToTop from '../components/ScrollToTop.jsx';

const Portfolio = React.lazy(() => import('../container/Portfolio/Portfolio.jsx'));
const BrandContainer = React.lazy(() => import('../container/Brand/BrandContainer.jsx'));


const HomeOne = () => {
    return (
        <React.Fragment>
            <SEO title="Genesis – One Stop Business Solution in Bangladesh" />
            <Header />
            <IntroSlider />
            <HomeAbout />
            <ServiceIconBox classOption="bg-color-1" />
            <Portfolio />
            <BrandContainer classOption="section-padding-bottom" />
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

export default HomeOne;
