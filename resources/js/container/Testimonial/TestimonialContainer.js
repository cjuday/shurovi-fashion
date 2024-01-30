import PropTypes from "prop-types";
import React, {useEffect, useState} from 'react';
import Testimonial from '../../components/Testimonial/Testimonial.jsx';
import SectionTitle from '../../components/SectionTitles/SectionTitle';
import Swiper, { SwiperSlide } from "../../components/swiper";



const TestimonialContainer = ({ classOption }) => {
    const sliderOptions = {
        initialSlide: "1",
        spaceBetween: 50,
        slidesPerView: 1,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        pagination: true,
        breakpoints: {
            991:{
                slidesPerView : 2
            },
            1499:{
                slidesPerView : 3
            }
        }
    }

    const [data, setData] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/tstm")
            .then((response) => response.json())
            .then((data) => {
                setData(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);

    return (
        <div className={`testimonial-section section section-padding-t90 text-center section-padding-bottom ${classOption}`}>
            <div className="container-fluid ps-xl-16 ps-lg-3 ps-md-3 ps-sm-3 ps-3 pe-xl-16 pe-lg-3 pe-md-3 pe-sm-3 pe-3">
                <SectionTitle
                    headingOption="title fz-28"
                    title="What our customers are saying about our services"
                />

                <Swiper className="testimonial-slider" data-aos="fade-up" data-aos-delay="300" options={sliderOptions}>
                    {data &&
                        data.map((single, key) => {
                            return(
                                <SwiperSlide key={key}>
                                    <Testimonial data={single} key={key} />
                                </SwiperSlide>
                            ); 
                    })}
                </Swiper>
            </div>
        </div>
    )
}

TestimonialContainer.propTypes = {
    classOption: PropTypes.string
};
TestimonialContainer.defaultProps = {
    classOption: "testimonial-section section section-padding-t90 section-padding-bottom"
};

export default TestimonialContainer;
