import React from 'react';
import {Link} from "react-router-dom";

const FooterLinkItem = () => {
    return (
        <div className="footer-widget">
            <h4 className="footer-widget-title">Quick Links</h4>
            <div className="footer-widget-content">
                <ul>
                        <li key="1">
                            <Link to="/">Home</Link>
                        </li>
                        <li key="2">
                            <Link to="/about">About Us</Link>
                        </li>
                        <li key="3">
                            <Link to="/products">Products</Link>
                        </li>
                        <li key="4">
                            <Link to="/about">Contact Us</Link>
                        </li>
                </ul>
            </div>
        </div>
    )
}


export default FooterLinkItem;
