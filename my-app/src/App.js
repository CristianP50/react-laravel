import { useEffect, useState } from "react";
import axios from "axios";


function App() {
  const url = 'http://127.0.0.1:8000/api/restaurante';
  const [datos, setDatos] = useState([]);
  const fetchAPI = async () => {
    const respon = await fetch(url);
    const responseJson = await respon.json();
    setDatos(responseJson);
    console.log(responseJson);
  }

  useEffect(() => {
    fetchAPI();
  }, [])

  //Post------------------------------------------------

  const [nombre, setNombre] = useState('')
  const [activo, setActivo] = useState('')
  const [id, setId] = useState(null)

  function submit(e) {
    console.log(id);
    e.preventDefault();
    if (id) {
      axios.put(url, {
        nombre,
        activo,
        id
      })
        .then(function (res) {
          setId(null);
          window.location.reload(true);
        })
    } else {
      axios.post(url, {
        nombre,
        activo
      })
        .then(function (response) {
          console.log(response);
          window.location.reload(true);
        })
    }
  }

  //Put-----------------------------------------------------------
  const edit = (id, e, nombre, activo) => {
    e.preventDefault();
    axios.get(
      `${url}/${id}`,
      {
        nombre,
        activo
      })
      .then(function (res) {
        console.log(res.data.nombre);
        setNombre(res.data.nombre);
        setActivo(res.data.activo);
        setId(id);
      })
  }

  //Delete----------------------------------------------------------------

  const postDelete = (id, e) => {
    e.preventDefault();
    axios.delete(`${url}/${id}`,)
      .then(function (response) {
        console.log(response);
        window.location.reload(true);
      })
  }


  return (
    <>
      <div style={{ display: 'flex', flexWrap: 'wrap' }}>

        <table className="table"
          style={{
            width: '50%', margin: 'auto',
            marginTop: '30px', border: 'solid',
          }}>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Activo</th>

            </tr>
          </thead>
          <tbody>
            {!datos ? 'cargando' :
              datos.map((datos, index) => {
                return (
                  <tr key={index}>
                    <th scope="row">{datos.id}</th>
                    <td>{datos.nombre}</td>
                    <td>{datos.activo}</td>
                    <td><button onClick={(e) => postDelete(datos.id, e)} type="button"
                      className="btn btn-danger">Eliminar</button>
                    </td>
                    <td><button onClick={(e) => edit(datos.id, e)} type="button"
                      className="btn btn-info">Editar</button>
                    </td>
                  </tr>
                );
              })}
          </tbody>
        </table>

        <form style={{
          width: '40%',
          margin: 'auto', marginTop: '50px',
          marginTop: '30px', border: 'solid',
          padding: '10px'
        }}>
          <div className="mb-3">
            <label className="form-label">Ingrese nombre</label>
            <input type="text" value={nombre} onChange={(e) => setNombre(e.target.value)} id="name" className="form-control" />
          </div>
          <div className="mb-3">
            <label className="form-label">Activo</label>
            <input type="number" value={activo} onChange={(e) => setActivo(e.target.value)} id="activo" className="form-control" />
          </div>
          <button onClick={submit} type="button" className="btn btn-primary">Enviar</button>
        </form>
      </div>
    </>
  );
}

export default App;
