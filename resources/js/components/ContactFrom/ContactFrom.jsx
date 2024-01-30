import React, { useState } from 'react';
import { useForm } from "react-hook-form";

const ContactFrom = () => {
    const { register, handleSubmit, resetField, formState: { errors, isSubmitting } } = useForm({
        mode: "onBlur"
    });

    const [msg, setMsg] = useState('');
    const [errmsg, seterrMsg] = useState('');

    const onSubmit = data => {
        const url = "https://new.taiammumuday.com/api/mails";
        fetch(url, {
          method: "POST",
          headers: {
            "Content-type": "application/json"
          },
          body: JSON.stringify({
            name: data.name,
            email: data.email,
            subject: data.subject,
            message: data.message
          })
        })
          .then((resp) => resp.json())
          .then((data) => {
            resetField("name");
            resetField("email");
            resetField("subject");
            resetField("message");
            setMsg(data.message);
          })
          .catch ((err) => {
            console.error(err)
          });
      };

    return (
        <div className="contact-form" data-aos="fade-up" data-aos-delay="300">
            {msg &&
            <p className='alert alert-success text-center'>{msg}</p>}
            {errmsg &&
            <p className='alert alert-danger text-center'>{errmsg}</p>}
            <form onSubmit={handleSubmit(onSubmit)}>
                <div className="row mb-n6">
                    <div className="col-md-6 col-12 mb-6">
                        <input
                            type="text"
                            placeholder="Your Name *"
                            name="name"
                            {...register("name", {
                                required: "Name is required",
                            })}
                        />
                        {errors?.name && <b className='text-danger'>x {errors.name?.message}</b>}
                    </div>
                    <div className="col-md-6 col-12 mb-6">
                        <input
                            type="email"
                            className=''
                            placeholder="Email *"
                            name="email"
                            {...register("email", {
                                required: "Email is required",
                                pattern: {
                                    value: /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
                                    message: "invalid email address",
                                },
                            })}
                        />
                        {errors?.email && <b className='text-danger'>x {errors.email?.message}</b>}
                    </div>
                    <div className="col-md-12 col-12 mb-6">
                        <input
                            type="text"
                            placeholder="Subject *"
                            name="subject"
                            {...register("subject", {
                                required: "Subject is required",
                            })}
                        />
                        {errors?.subject && <b className='text-danger'>x {errors.subject?.message}</b>}
                    </div>
                    <div className="col-12 mb-6">
                        <textarea
                            name="message"
                            placeholder="Message"
                            {...register("message", {
                                required: "Message is required",
                            })}
                        ></textarea>
                        {errors?.message && <b className='text-danger'>x {errors.message?.message}</b>}
                    </div>
                    <div className="col-12 text-left mb-6">
                        <button disabled={isSubmitting} className="btn btn-primary">
                            {isSubmitting && (
                                <span className="spinner-grow spinner-grow-sm"></span>
                            )}
                                Send Query
                        </button>
                    </div>
                </div>
            </form>
        </div>
    )
}

export default ContactFrom;
