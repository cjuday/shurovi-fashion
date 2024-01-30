import { useState} from "react";
import PropTypes from "prop-types";
import Product from '../../components/Product/Product.jsx';
import { Swiper, SwiperSlide } from 'swiper/react';
import { FreeMode, Navigation, Thumbs } from "swiper";
// Import Swiper styles
import "swiper/css";
import "swiper/css/free-mode";
import "swiper/css/navigation";
import "swiper/css/thumbs";


const ProductSlider = ({data}) => {

    const [thumbsSwiper, setThumbsSwiper] = useState(null);
    return (
        <>
        <Swiper style={{
          "--swiper-navigation-color": "#000",
          "--swiper-pagination-color": "#000",
        }}
            speed={750}
            spaceBetween={0}
            navigation={true}
            loop={true}
            thumbs={{ swiper: thumbsSwiper }}
            modules={[FreeMode, Navigation, Thumbs]}
        >
        {data &&
                    data.map((data, i) => {
                        return(
                            <SwiperSlide key={i}>
                                <Product data={data} key={i}/>
                            </SwiperSlide>
                        ); 
                    })}
      </Swiper>
      <Swiper 
        breakpoints= {{
            1200:{
                slidesPerView : 4
            },
            992:{
                slidesPerView : 4
            },
            768:{
                slidesPerView : 4

            },
            576:{
                slidesPerView : 3
            },
            320:{
                slidesPerView : 2
            }
        }}
        onSwiper={setThumbsSwiper}
        spaceBetween={10}
        navigation={true}
        freeMode={true}
        style={{
            "--swiper-navigation-color": "#000",
            "--swiper-pagination-color": "#000"
          }}
        watchSlidesProgress={true}
        modules={[FreeMode, Navigation, Thumbs]}
        className="mySwiper"
      >
        {data && data.map((data, i) => {
            return(
                <SwiperSlide key={i}>
                    <img src={data}/>
                </SwiperSlide>
            ); 
        })}
      </Swiper>
      </>
    )
}

ProductSlider.propTypes = {
    data: PropTypes.array,
};

export default ProductSlider
