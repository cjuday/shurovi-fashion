import React from 'react'
import {NavLink} from 'react-router-dom';

const NavBar = () => {
    return (
        <nav className="site-main-menu">
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
                <li className="nav-item dropdown">
                    <NavLink to={process.env.PUBLIC_URL + "/"} className="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src={`${process.env.PUBLIC_URL}/images/flags/united-kingdom.png`} className="flag"/> English
                    </NavLink>
                    <ul className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/france.png`} className="flag"/> French</NavLink></li>
                        <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/spain.png`} className="flag"/> Spanish</NavLink></li>
                        <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/germany.png`} className="flag"/> German</NavLink></li>
                        <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/italy.png`} className="flag"/> Italian</NavLink></li>
                    </ul>
                </li>
            </ul>
        </nav>
    )
}

export default NavBar
