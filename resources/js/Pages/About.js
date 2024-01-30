import React, {useState, useEffect} from 'react';
import SEO from '../components/SEO';
import Header from "../partials/header/Header";
import Breadcrumb from '../container/Breadcrumb/Breadcrumb';
import AboutFour from '../container/About/AboutFour';
import Mission from '../container/About/Mission';
import Value from '../container/About/Value';
import ServiceList from '../container/Services/ServiceList';
import AboutFive from '../container/About/AboutFive';
import TestimonialContainer from '../container/Testimonial/TestimonialContainer';
import Footer from '../container/Footer/Footer';
import ScrollToTop from '../components/ScrollToTop.jsx';

const AboutUs = () => {
    const [cover, setCover] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/covers/1")
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
            <SEO title="About Us" />
            <Header />
            <Breadcrumb 
                image={cover.src}
                title={cover.title}
                content="Home"
                contentTwo="About Us"
            />
            <AboutFour />
            <ServiceList/>
            <AboutFive />
            <Mission/>
            <Value/>
            <TestimonialContainer classOption="bg-primary-blue" />
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

export default AboutUs;



