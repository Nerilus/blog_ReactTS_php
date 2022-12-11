import React, { ChangeEvent, FormEvent, useState } from 'react'
import { useNavigate } from 'react-router-dom'
import { FormPost, IShowProps } from '../../types/Post'

function AddPost({setPosts, posts}: IShowProps) {
  const [formData, setFormData] = useState<FormPost>({ title: "", content: "" })

    // @ts-ignore
    const token = JSON.parse(sessionStorage.token)
    const navigate = useNavigate()

    const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();

        fetch('http://localhost:5657/post', {
            method: "POST",
            mode: "cors",
            body: new URLSearchParams({
                ...formData
            }),
            credentials: "include",
            headers: new Headers({
                "Authorization" : "Bearer " + token.token,
                "Content-type":  "application/x-www-form-urlencoded"
            })
        })
            .then(data => data.json())
            .then((json) => {
                if (json.message) {
                    if (json.message === "invalid cred") {
                        sessionStorage.removeItem('token');
                        navigate("/")
                    }
                    return
                }
                setPosts(
                    prevState => {
                        return {
                            posts: [
                                json.post,
                                ...prevState.posts,
                            ]
                        }
                    }
                )
            })
    }

    const handleChange = (e: ChangeEvent) => {
        setFormData(prevState => {
            return {
                ...prevState,
                // @ts-ignore
                [e.target.name]: e.target.value
            }
        })
    }

  return (
    <form onSubmit={handleSubmit}>
    <div className="form-group">
    <label >title</label>
    <input type="text" className="form-control" id="exampleFormControlInput1" placeholder="titre" />
  </div>
    <div className="form-check">
    <div className="form-group">
    <label >Contenue</label>
    <textarea className="form-control" id="exampleFormControlTextarea1" />
  </div>
    </div>
    <button type="submit" className="btn btn-primary">Submit</button>
  </form>
  )
}

export default AddPost