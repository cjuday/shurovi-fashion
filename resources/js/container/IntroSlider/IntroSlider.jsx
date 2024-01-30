import React, {useState, useEffect} from 'react';
import Intro from '../../components/Intro/Intro.jsx';
import SwiperSlider, {SwiperSlide} from "../../components/swiper"

const IntroSlider =  () => {
    const swiperOption = {
        initialSlide: "1",
        loop: true,
        speed: 750,
        spaceBetween: 0,
        slidesPerView: 1,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: true,
    }

    const [sliData, setsliData] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/sliders")
            .then((response) => response.json())
            .then((data) => {
                setsliData(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);

    return (
        <div className="intro-slider-wrap section">
            <SwiperSlider effect="fade" className="intro-slider" options={swiperOption}>
                {sliData &&
                    sliData.map((single, id) => {
                        return(
                            <SwiperSlide key={id}>
                                <Intro data={single} key={id} />
                            </SwiperSlide>
                        ); 
                    })}
            </SwiperSlider>
        </div>
    )
}

export default IntroSlider
