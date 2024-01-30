import React, {useState,useEffect} from 'react';
import SectionTitleTwo from '../../components/SectionTitles/SectionTitleTwo';
import WorkItem from "../../components/Work/WorkItem";


const Portfolio = () => {

    const [catData, setcatData] = useState([]);

    const fetchcatData = async() => {
        return await fetch("https://new.taiammumuday.com/api/hmps")
            .then((response) => response.json())
            .then((data) => {
                setcatData(data);
            });
    }

    useEffect(() => {
        fetchcatData();
    },[]);

    return (
        <div className="section section-padding ag-masonary-wrapper">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-5">
                            <SectionTitleTwo 
                                subTitle="Some of our finest works"
                                title="Our Products"
                            />
                    </div>
                </div>

                <div className="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-0 mesonry-list">
                    {catData && catData.map(portfolio => (
                        <div key={portfolio.id}>
                            <WorkItem portfolio={portfolio}/>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

export default Portfolio;