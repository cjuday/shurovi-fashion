import {useState, useEffect} from "react";
import SectionTitleTwo from '../../components/SectionTitles/SectionTitleTwo';
import Tilt from 'react-parallax-tilt';

const AboutFive = () => {
    const [scale] = useState(1.04);
    const [data, setData] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/abouts/2")
            .then((response) => response.json())
            .then((data) => {
                setData(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);

    return (
        <div className="section section-padding-top mb-6">
            <div className="container">

                <div className="row">

                    <div className="col-xl-7 col-lg-6 col-12" data-aos="fade-up">
                        <div className="about-image-area">
                            <div className="about-image">
                                <Tilt scale={scale} transitionSpeed={4000}>
                                    <img src={data.img2} alt={data.title} />
                                </Tilt>
                            </div>
                            <div className="about-image">
                                <Tilt scale={scale} transitionSpeed={4000}>
                                    <img src={data.img1} alt={data.title} />
                                </Tilt>
                            </div>
                        </div>
                    </div>

                    <div className="col-xl-5 col-lg-6 col-12" data-aos="fade-up" data-aos-delay="300">
                        <div className="about-content-area">
                            <SectionTitleTwo
                                title="Our Vision"
                            />

                            <div className="row row-cols-sm-2 row-cols-auto mb-3">
                                {data.details}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    )
}

export default AboutFive;
