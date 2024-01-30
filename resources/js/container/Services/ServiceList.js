import PropTypes from "prop-types";
import React , {useState, useEffect} from 'react';
import SectionTitle from '../../components/SectionTitles/SectionTitle';
import ServBox from './ServBox';


const ServiceList = () => {
    const [data, setData] = useState([]);

    const fetchsliData = async() => {
        return await fetch("https://new.taiammumuday.com/api/services")
            .then((response) => response.json())
            .then((data) => {
                setData(data);
            });
    }

    useEffect(() => {
        fetchsliData();
    },[]);
    return (
        <div className={`section section-padding-t90-b100 box-border text-center bg-color-1`}>
            <div className="container">

                <SectionTitle
                    title="Our Services"
                />
                
                <div className="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mb-n6">

                    {data && data.map((single, key) => {
                            return(
                                <div key={key} className="col mb-6" data-aos="fade-up">
                                    <ServBox classOption="box-border" data={single} key={key} />
                                </div>
                            ); 
                    })}
                </div>

            </div>
        </div>
    )
}

ServiceList.propTypes = {
    classOption: PropTypes.string
  };
  ServiceList.defaultProps = {
    classOption: "section section-padding-t90-b100"
};

export default ServiceList;
