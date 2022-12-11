import {ChangeEvent, Dispatch, FormEvent, SetStateAction, useEffect, useRef, useState} from "react";

import { useNavigate} from "react-router-dom";
import { IShowProps } from "../../types/Post";
import Post from "./Post";



export default function ViewPost({setPosts, posts}: IShowProps) {

    // @ts-ignore
    const token = JSON.parse(sessionStorage.token)
    const navigate = useNavigate()

    useEffect(() => {
        fetch('http://localhost:5657/', {
            headers: new Headers({
                "Authorization" : "Bearer " + token.token,
            })
        })
            .then(data => data.json())
            .then(json => {
                if (json.message) {
                    if (json.message === "invalid cred") {
                        sessionStorage.removeItem('token');
                        navigate("/login")
                    }
                    return
                }
                setPosts(json)
            })

    },[])

    console.log(posts)

    return (
        <>

            {posts.posts.map((value, index) => {
                return (<Post key={index} {...value}/>)
            })}
        </>
    )
}