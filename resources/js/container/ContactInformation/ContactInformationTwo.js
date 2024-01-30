import PropTypes from "prop-types";
import SectionTitle from '../../components/SectionTitles/SectionTitle';

const ContactInformationTwo = ({ classOption }) => {

    return (
        <div className={`section section-padding-t90 ${classOption}`}>
            <div className="container shape-animate">
                <SectionTitle
                    titleOption="section-title text-left mb-lg-12 mb-sm-8 mb-xs-8"
                    headingOption="fz-32"
                    title="Contact Us"
                    subTitle="Our team who love what they do and we would love to hear from you!"
                />

                <div className="row row-cols-lg-1 row-cols-md-1 row-cols-sm-1 row-cols-1 mb-6">
                    {/*Location*/}
                    <div key={1} className="col mb-2" data-aos="fade-up">
                       <div className="info">
                                <h4 className="title">Address</h4>
                                <span className="info-text">House # 320(1st Floor), Road # 04,<br/>
                                    Mirpur D.O.H.S, Dhaka-1216, Bangladesh.</span>
                            </div>
                        </div>
                    {/*Completed*/}
                    {/*Phone numbers*/}
                    <div key={2} className="col mb-2" data-aos="fade-up">
                            <div className="info">
                                <h4 className="title">Phone</h4>
                                <span className="info-text">880251040131</span>
                                <br/>
                                <span className="info-text">8801713044511</span>
                                <br/>
                                <span className="info-text">8801823778088</span>
                            </div>
                    </div>
                    {/*Completed*/}
                    {/*Email Addresses*/}
                    <div key={3} className="col mb-2" data-aos="fade-up">
                            <div className="info">
                                <h4 className="title">Email</h4>
                                <span className="info-text">info@genesis-bd.com</span>
                                <br/>
                                <span className="info-text">monju@genesis-bd.com</span>
                                <br/>
                                <span className="info-text">sadman@genesis-bd.com</span>
                            </div>
                    </div>
                    {/*Completed*/}
                </div>

                

            </div>
        </div>
    )
}

ContactInformationTwo.propTypes = {
    classOption: PropTypes.string
};
ContactInformationTwo.defaultProps = {
    classOption: "section section-padding-t90-b100"
};

export default ContactInformationTwo
