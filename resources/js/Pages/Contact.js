import React, {useState, useEffect} from 'react';
import SEO from '../components/SEO';
import Header from "../partials/header/Header";
import Breadcrumb from '../container/Breadcrumb/Breadcrumb';
import ContactInformationTwo from '../container/ContactInformation/ContactInformationTwo';
import ContactFromContainer from '../container/ContactFromContainer/ContactFromContainer';
import Footer from '../container/Footer/Footer';
import ScrollToTop from '../components/ScrollToTop.jsx';

const Contact = () => {
    const [cover, setCover] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/covers/3")
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
            <SEO title="Contact Us" />
            <Header />
            <Breadcrumb 
                image={cover.src}
                title={cover.title}
                content="Home"
                contentTwo="Contact Us"
            />
            <div className="container">
            <div className="row">
                <div className="col-lg-4 col-md-12 col-sm-12">
                    <ContactInformationTwo />
                </div>
                <div className="col-lg-8 col-md-12 col-sm-12">
                    <ContactFromContainer />
                </div>
            </div>
            </div>
            <Footer />
            <ScrollToTop />
        </React.Fragment>
    )
}

export default Contact;

