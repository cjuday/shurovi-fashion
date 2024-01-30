import React from 'react';
import SectionTitle from '../../components/SectionTitles/SectionTitle';
import ContactFrom from '../../components/ContactFrom/ContactFrom.jsx';

const ContactFromContainer = () => {
    return (
        <div className="contact-form-section section section-padding-t90-b100">
                    <div className="offset-lg-2 col-lg-10">
                        <SectionTitle
                            headingOption="fz-32"
                            title="Quick Contact Form"
                            subTitle=""
                        />
                        <ContactFrom />
                    </div>
                </div>
    )
}

export default ContactFromContainer
