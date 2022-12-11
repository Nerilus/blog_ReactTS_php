import {ChangeEvent, Dispatch, FormEvent, SetStateAction, useEffect, useRef, useState} from "react";
import { useNavigate } from "react-router-dom";

export interface formDataInterface {
    username: string,
    password: string
}

export default function Login() {


    const [login, setLogin] = useState<formDataInterface>({password: "", username: ""})
    const navigate = useNavigate()

    const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
      e.preventDefault();

      fetch('http://localhost:5657/login', {
          method: "POST",
          mode: "cors",
          body: new URLSearchParams({
              ...login
          }),
          credentials: "include",
          headers: new Headers({
              "Authorization" : "Basic amZnbWFpbC5jb206cGFzc3dvcmQ=",
              "Content-type":  "application/x-www-form-urlencoded"
          })
      })
          .then(data => data.json())
          .then(json => {
              if (json.token) {
                  sessionStorage.setItem('token', JSON.stringify(json))
                  navigate("/")
              }
          })
  }

  const handleChange = (e: ChangeEvent) => {
      setLogin(prevState => {
          return {
              ...prevState,
              // @ts-ignore
              [e.target.name]: e.target.value
          }
      })
  }

   

    return (
      <div>
    <section className="vh-100">
    <div className="container-fluid h-custom">
    <div className="row d-flex justify-content-center align-items-center h-100">
      <div className="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          className="img-fluid" alt="Sample image"/>
      </div>
      <div className="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form onSubmit={handleSubmit}>
          <div className="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p className="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" className="btn btn-primary btn-floating mx-1">
              <i className="fab fa-facebook-f"></i>
            </button>

            <button type="button" className="btn btn-primary btn-floating mx-1">
              <i className="fab fa-twitter"></i>
            </button>

            <button type="button" className="btn btn-primary btn-floating mx-1">
              <i className="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div className="divider d-flex align-items-center my-4">
            <p className="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

        
          <div className="form-outline mb-4">
            <input type="name" id="form3Example3" className="form-control form-control-lg"
              placeholder="Enter a valid email address" onChange={handleChange} />
            <label className="form-label">username</label>
          </div>
          <div className="form-outline mb-3">
            <input type="password" id="form3Example4" className="form-control form-control-lg"
              placeholder="Enter password" onChange={handleChange} />
            <label className="form-label" >Password</label>
          </div>

          <div className="d-flex justify-content-between align-items-center">
            <div className="form-check mb-0">
              <input className="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label className="form-check-label" >
                Remember me
              </label>
            </div>
            <a href="#!" className="text-body">Forgot password?</a>
          </div>

          <div className="text-center text-lg-start mt-4 pt-2">
            <button type="submit" className="btn btn-primary btn-lg"
            >Login</button>
            <p className="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                className="link-danger">Register</a></p>
          </div>
      </form>
      </div>
    </div>
  </div>  
</section>
      </div>
  
    )
}
