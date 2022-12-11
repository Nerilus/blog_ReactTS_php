import {IShowProps} from "../types/Post";

import {useLocation, useNavigate} from "react-router-dom";
import React from "react";
import AddPost from "../components/Post/AddPost";
import ViewPost from "../components/Post/ViewPost";

export default function Home({setPosts, posts}: IShowProps) {

    const navigate = useNavigate()

    const deco = () => {
        sessionStorage.removeItem('token');
        navigate("/login");
    }

    return(
        <div>
          
            <AddPost setPosts={setPosts} posts={posts}/>
            <ViewPost setPosts={setPosts} posts={posts}/>
        </div>
    )
}