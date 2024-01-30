import React from 'react';
import Logo from '../../components/logo/Logo';
import FooterLinkContact from '../../components/Footer/FooterLinkContact';

const Footer = () => {

    return (
        <div className="footer-section section footer-bg-color">
            <div className="container">
                <div className="row">
                    <div className="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 col-12 mb-6">
                        <div className="footer-widget">
                            <div className="footer-logo">
                                <Logo 
                                    image={`${process.env.PUBLIC_URL}/images/logo/logo.png`}
                                />
                                <div className="footer-widget-content">
                                        One Stop Garments Solution in Bangladesh
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 col-12 mb-6">
                        <FooterLinkContact/>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Footer
