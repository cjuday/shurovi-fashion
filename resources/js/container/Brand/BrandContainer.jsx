import PropTypes from "prop-types";
import React, {useState, useEffect} from 'react';
import Brand from '../../components/Brand/Brand.jsx';
import SectionTitle from '../../components/SectionTitles/SectionTitle.jsx';
import Swiper, { SwiperSlide } from "../../components/swiper/index.jsx";

const BrandContainer = ({ classOption }) => {

    const [brnData, setbrnData] = useState([]);

    const fetchbrnData = async() => {
        return await fetch("https://new.taiammumuday.com/api/brands")
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
            });
    }

    useEffect(() => {
        fetchbrnData();
    },[]);

    const sliderOptions = {
        spaceBetween: 30,
        slidesPerView: 6,
        loop: true,
        breakpoints: {
            1200:{
                slidesPerView : 6
            },
            992:{
                slidesPerView : 5
            },
            768:{
                slidesPerView : 5

            },
            576:{
                slidesPerView : 4
            },
            320:{
                slidesPerView : 2
            }
        }
    }
    return (
        <div className={`brand-section section ${classOption}`}>
            <div className="container text-center">
            <SectionTitle
                    title="Our Clients"
                />
                <div className="row">
                    <div className="col-lg-12" data-aos="fade-up">
                        <div className="brand-wrapper">
                            <div className="brand-list">
                                <Swiper className="brand-carousel" options={sliderOptions}>
                                    {brnData &&
                                        brnData.map((single, id) => {
                                            return(
                                                <SwiperSlide key={id}>
                                                    <Brand data={single} key={id} />
                                                </SwiperSlide>
                                            ); 
                                    })}
                                        
                                </Swiper>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

BrandContainer.propTypes = {
    classOption: PropTypes.string
};
BrandContainer.defaultProps = {
    classOption: "brand-section section section-padding-bottom"
};

export default BrandContainer;
