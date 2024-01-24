import React, { useState } from 'react';

const Test = (props) => {
    const data = props.data;
    return(
        <div className="container">
            <table className="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Capital</th>
                        <th>Currency</th>
                        <th>Phone Extension</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map((item, index) => {
                        return(
                            <tr key={index}>
                                <td>{index+1}</td>
                                <td>{item.name}</td>
                                <td>{item.capital}</td>
                                <td>{item.currencies?.map((cur, key) => {
                                    return(
                                        <li key={key}>{cur.code} ({cur.symbol})</li>
                                    )
                                })}</td>
                                <td></td>
                            </tr>
                        )
                    })}
                </tbody>
            </table>
        </div>
    )
}

export default Test;