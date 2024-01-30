import React,{useState, useEffect} from "react";
import { Link } from "react-router-dom";
import PropTypes from "prop-types";

const CategoryNav = ({ classOption }) => {

    const [brnData, setbrnData] = useState([]);

    const fetchbrnData = () => {
        return fetch(`https://new.taiammumuday.com/api/groups`)
            .then((response) => response.json())
            .then((data) => {
                setbrnData(data);
            });
    }
    

    useEffect(() => {
        setTimeout(() => {
        }, 20000);
        fetchbrnData();
    });


    return(
        <>
            <div className={`messonry-button ${classOption} pt-5`}>
                    {brnData.map((cat) => 
                        <Link reloadDocument key={cat.id} to={`/products/${cat.name}/All`}>
                            <button id={cat.id}><span className="filter-text catbox">{cat.name}</span></button>
                        </Link>
                    )}
            </div>
        </>
    )
}

CategoryNav.propTypes = {
    classOption: PropTypes.string
}

CategoryNav.defaultProps = {
    classOption: "text-lg-center text-center mb-lg-13 mb-md-13 mb-6"
};

export default CategoryNav;