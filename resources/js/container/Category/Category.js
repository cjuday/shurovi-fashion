import PropTypes from "prop-types";
import React, {useState, useEffect} from 'react';
import SectionTitle from '../../components/SectionTitles/SectionTitle';
import { Link } from "react-router-dom";

const Category = ({ classOption }) => {

    const [brnData, setbrnData] = useState([]);

    const fetchbrnData = async() => {
        return await fetch("https://new.taiammumuday.com/api/groups")
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
            });
    }

    useEffect(() => {
        fetchbrnData();
    },[]);

    return (
        <div className={`brand-section section ${classOption}`}>
            <div className="container text-center pt-10">
            <SectionTitle
                    title="Product Categories"
                />
                <div className="row row-cols-lg-3 row-cols-md-2 row-cols-1 pt-6">
                    {brnData && brnData.map((data) => {
                        return(
                            <div key={data.id} className="col mb-6 cat-image" data-aos="fade-up" data-aos-delay="300">
                                <Link to={`/products/${data.name}/All`}>
                                    <img src={data.src} className="cats-img"/>
                                    <div className="content">
                                        {data.name}
                                    </div>
                                </Link>
                            </div>
                        ); 
                    })}
                </div>
            </div>
        </div>
    )
}

Category.propTypes = {
    classOption: PropTypes.string
};
Category.defaultProps = {
    classOption: "brand-section section section-padding-bottom"
};

export default Category;
