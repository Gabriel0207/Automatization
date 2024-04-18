using OpenQA.Selenium;
using OpenQA.Selenium.Firefox;
using System;
using System.Collections.Generic;
using System.IO;
using System.Threading;

class Program
{
    static void Main(string[] args)
    {
        // Iniciar el navegador Firefox
        IWebDriver driver = new FirefoxDriver();

        // Navegar a la página de inicio de sesión
        driver.Navigate().GoToUrl("https://libreriagabriel.000webhostapp.com/");

        // Maximizar la ventana del navegador (opcional)
        driver.Manage().Window.Maximize();

        Thread.Sleep(5000);

        try
        {
            // Localizar el campo de nombre de usuario y enviar las credenciales
            IWebElement usernameField = driver.FindElement(By.Name("username"));
            usernameField.SendKeys("admin");

            // Localizar el campo de contraseña y enviar las credenciales
            IWebElement passwordField = driver.FindElement(By.Name("password"));
            passwordField.SendKeys("admin");

            // Localizar el botón de inicio de sesión y hacer clic en él
            IWebElement loginButton = driver.FindElement(By.XPath("//input[@type='submit']"));
            loginButton.Click();
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un elemento en la página: " + e.Message);
        }

        // Esperar un tiempo adicional para ver el resultado (opcional)
        Thread.Sleep(5000);

        // Navegar a la página de agregar libro
        driver.FindElement(By.LinkText("Agregar Libro")).Click();

        Thread.Sleep(2000);

        try
        {
            // Rellenar el formulario con la información del libro
            driver.FindElement(By.Name("titulo")).SendKeys("Caballeros de Mablasca");
            driver.FindElement(By.Name("tipo")).SendKeys("Fantasía");
            driver.FindElement(By.Name("precio")).SendKeys("10");
            driver.FindElement(By.Name("avance")).SendKeys("5");
            driver.FindElement(By.Name("total_ventas")).SendKeys("100");
            driver.FindElement(By.Name("notas")).SendKeys("Primera edición del libro de Gylber Moreno Olivo");

            // Rellenar la fecha de publicación con la fecha del libro
            driver.FindElement(By.Name("fecha_pub")).SendKeys("2024-01-01");

            // Hacer clic en el botón de agregar libro utilizando el texto del botón
            driver.FindElement(By.XPath("//input[@value='Agregar Libro']"));
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un elemento en la página: " + e.Message);
        }


        Thread.Sleep(2000);

        // Regresar a la página anterior
        driver.Navigate().Back();

        // Navegar a la página de agregar autor
        driver.FindElement(By.LinkText("Agregar Autor")).Click();

        Thread.Sleep(2000);

        try
        {
            // Rellenar el formulario con la información del autor
            driver.FindElement(By.Name("nombre")).SendKeys("Gylbert");
            driver.FindElement(By.Name("apellido")).SendKeys("Moreno Olivo");
            driver.FindElement(By.Name("telefono")).SendKeys("00000");
            driver.FindElement(By.Name("direccion")).SendKeys("España");
            driver.FindElement(By.Name("ciudad")).SendKeys("Madrid");
            driver.FindElement(By.Name("estado")).SendKeys("Madrid");
            driver.FindElement(By.Name("pais")).SendKeys("España");
            driver.FindElement(By.Name("cod_postal")).SendKeys("12345");

            // Hacer clic en el botón de agregar autor utilizando el texto del botón
            driver.FindElement(By.XPath("//input[@value='Agregar Autor']"));
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un elemento en la página: " + e.Message);
        }

        Thread.Sleep(2000);

        // Regresar a la página anterior
        driver.Navigate().Back();

        Thread.Sleep(2000);

        // Navegar a la página de gestionar comentarios
        driver.FindElement(By.LinkText("Gestionar Comentarios")).Click();

        Thread.Sleep(2000);

        try
        {
            // Verificar si hay algún comentario presente
            if (driver.FindElements(By.Name("borrar_comentario")).Count > 0)
            {
                // Si hay un comentario, hacer clic en el botón de borrar
                driver.FindElement(By.CssSelector("input[type='submit'][name='borrar_comentario']")).Click();
            }
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un comentario para borrar: " + e.Message);
        }

        Thread.Sleep(2000);

        // Regresar a la página anterior
        driver.Navigate().Back();

        Thread.Sleep(2000);

        // Regresar a la página anterior
        driver.Navigate().Back();
        Thread.Sleep(2000);

        // Hacer clic en "Regresar al Login"
        driver.FindElement(By.LinkText("Regresar al Login")).Click();

        Thread.Sleep(2000);
        try
        {
            // Localizar el campo de nombre de usuario y enviar las credenciales
            IWebElement usernameField = driver.FindElement(By.Name("username"));
            usernameField.SendKeys("gabriel");

            // Localizar el campo de contraseña y enviar las credenciales
            IWebElement passwordField = driver.FindElement(By.Name("password"));
            passwordField.SendKeys("123");

            // Localizar el botón de inicio de sesión y hacer clic en él
            IWebElement loginButton = driver.FindElement(By.XPath("//input[@type='submit']"));
            loginButton.Click();
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un elemento en la página: " + e.Message);
        }
        Thread.Sleep(5000);

        // Navegar a la página de libros
        driver.FindElement(By.CssSelector("a.nav-link[href='libros.php']")).Click();

        Thread.Sleep(2000);

        // Navegar a la página de autores
        driver.FindElement(By.CssSelector("a.nav-link[href='autores.php']")).Click();

        Thread.Sleep(2000);

        // Navegar a la página de contacto
        driver.FindElement(By.CssSelector("a.nav-link[href='contacto.php']")).Click();

        Thread.Sleep(2000);

        try
        {
            // Rellenar el formulario de contacto con datos de prueba
            driver.FindElement(By.Id("name")).SendKeys("Nombre de prueba");
            driver.FindElement(By.Id("email")).SendKeys("prueba@example.com");
            driver.FindElement(By.Id("asunto")).SendKeys("Asunto de prueba");
            driver.FindElement(By.Id("message")).SendKeys("Mensaje de prueba");

            // Hacer clic en el botón de enviar
            driver.FindElement(By.CssSelector("button.btn.btn-primary.btn-xl")).Click();
        }
        catch (NoSuchElementException e)
        {
            Console.WriteLine("No se pudo encontrar un elemento en la página: " + e.Message);
        }

        Thread.Sleep(2000);

        // Regresar a la página anterior
        driver.Navigate().Back();

        Thread.Sleep(2000);

        // Navegar a la página de inicio
        driver.FindElement(By.CssSelector("a.nav-link[href='home.php']")).Click();

        Thread.Sleep(2000);

        // Navegar a la parte inferior de la página
        ((IJavaScriptExecutor)driver).ExecuteScript("window.scrollBy(0, 500);");
        Thread.Sleep(2000);

        driver.FindElement(By.CssSelector("a.navbar-brand[href='#page-top']")).Click();


        Thread.Sleep(2000);

        // Cerrar el navegador
        driver.Quit();
    }
}