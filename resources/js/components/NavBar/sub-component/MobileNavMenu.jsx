import React from 'react';
import {NavLink} from 'react-router-dom';

const MobileNavMenu = () => {
    return (
        <nav className="site-mobile-menu">
            <ul>
                <li>
                    <NavLink to={process.env.PUBLIC_URL + "/"}><span className="menu-text">Home</span></NavLink>
                </li>
                <li>
                    <NavLink to={process.env.PUBLIC_URL + "/about"}><span className="menu-text">About Us</span></NavLink>
                </li>
                <li>
                    <NavLink to={process.env.PUBLIC_URL + "/products"}><span className="menu-text">Products</span></NavLink>
                </li>
                <li>
                    <NavLink to={process.env.PUBLIC_URL + "/contact"}><span className="menu-text">Contact Us</span></NavLink>
                </li>
            </ul>
        </nav>
    )
}

export default MobileNavMenu;
