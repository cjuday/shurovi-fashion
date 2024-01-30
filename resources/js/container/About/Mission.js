import {useState, useEffect} from "react";
import SectionTitleTwo from '../../components/SectionTitles/SectionTitleTwo';
import Tilt from 'react-parallax-tilt';

const Mission = () => {
    const [data, setData] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/abouts/3")
            .then((response) => response.json())
            .then((data) => {
                setData(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);

    const [scale] = useState(1.04);
    return (
        <div className="section section-padding-top mb-6">
            <div className="container">
                <div className="row">

                    <div className="col-xl-6 col-lg-6 col-12" data-aos="fade-up">
                        <div className="about-content-area mt-0 mb-md-10 mb-10">
                            <SectionTitleTwo 
                                title="Our Mission"
                            />

                            <div className="row row-cols-sm-2 row-cols-auto mb-3">
                                {data.details}
                            </div>
                        </div>
                    </div>

                    <div className="col-xl-6 col-lg-6 col-12" data-aos="fade-up" data-aos-delay="300">
                        <div className="about-image-area about-shape-animation right-0 me-0">
                            <div className="about-image js-tilt">
                                <Tilt scale={scale} transitionSpeed={4000}>
                                    <img src={data.img2} alt={data.title} />
                                </Tilt>
                            </div>
                            <div className="about-image js-tilt">
                                <Tilt scale={scale} transitionSpeed={4000}>
                                    <img src={data.img1} alt={data.title} />
                                </Tilt>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    )
}

export default Mission;
