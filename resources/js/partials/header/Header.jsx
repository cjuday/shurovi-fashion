import {Fragment, useState, useEffect} from "react";
import Logo from '../../components/logo/Logo';
import NavBar from '../../components/NavBar/NavBar';
import MobileMenu from "../../components/NavBar/MobileMenu"
import { NavLink } from "react-router-dom";
const Header = () => {
    const [ofcanvasShow, setOffcanvasShow] = useState(false);
    const onCanvasHandler = () => {
        setOffcanvasShow(prev => !prev);
    }
    const [scroll, setScroll] = useState(0);
    const [headerTop, setHeaderTop] = useState(0);

    useEffect(() => {
        const header = document.querySelector(".header-section");
        setHeaderTop(header.offsetTop);
        window.addEventListener("scroll", handleScroll);
        return () => {
        window.removeEventListener("scroll", handleScroll);
        };
    }, []);

    const handleScroll = () => {
        setScroll(window.scrollY);
    };
    return (
        <Fragment>
            <div className={`header-section header-transparent sticky-header section ${
        scroll > headerTop ? "is-sticky" : ""
      }`}>
                <div className="header-inner">
                    <div className="container-fluid position-relative navx">
                        <div className="footer-widget-content">
                            <div className="row pe-3">
                                <div className="col-xl-6 col-lg-6 col-md-6 pr1">
                                    <i className="fa-solid fa-location-dot"></i> House # 320 (1st Floor), Road # 04, Mirpur D.O.H.S, Dhaka-1216, Bangladesh.
                                </div>
                                <div className="col-xl-6 col-lg-6 col-md-6 pr2">
                                    <i className="fa-solid fa-phone"></i>   880251040131
                                </div>
                            </div>
                        </div>
                        <hr id='navx'/>
                        <div className="row justify-content-between align-items-center">
                            <div className="col-xl-2 col-auto order-0">
                                <Logo 
                                    image={`${process.env.PUBLIC_URL}/images/logo/logo.png`}
                                />
                            </div>
                            <div className="col-auto col-xl d-flex align-items-right justify-content-xl-right justify-content-end order-2 order-xl-1">
                                <div className="menu-column-area d-none d-xl-block position-static">
                                    <NavBar />
                                </div>

                                <div className="header-mobile-menu-toggle d-xl-none ms-sm-2">
                                    <li className="nav-item dropdown langli">
                                        <NavLink to={process.env.PUBLIC_URL + "/"} className="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src={`${process.env.PUBLIC_URL}/images/flags/united-kingdom.png`} className="flag"/> EN
                                        </NavLink>
                                        <ul className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/france.png`} className="flag"/> FR</NavLink></li>
                                            <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/spain.png`} className="flag"/> ES</NavLink></li>
                                            <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/germany.png`} className="flag"/> DE</NavLink></li>
                                            <li><NavLink to={process.env.PUBLIC_URL + "/"} className="dropdown-item langli"><img src={`${process.env.PUBLIC_URL}/images/flags/italy.png`} className="flag"/> IT</NavLink></li>
                                        </ul>
                                    </li>
                                    <button type="button" className="toggle mob" onClick={onCanvasHandler}>
                                        <i className="icon-top"></i>
                                        <i className="icon-middle"></i>
                                        <i className="icon-bottom"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <MobileMenu show={ofcanvasShow} onClose={onCanvasHandler}/>
        </Fragment>
    )
}

export default Header;