import { publicRoute as route } from '@/router/helpers'

describe('Private route helper', () => {
  it('Basic private route', () => {
    const example = route({ path: '/home', name: 'Home' }, 'Home')

    const keys = Object.keys(example)

    expect(keys).toHaveLength(4)
    expect(keys).toContain('path')
    expect(keys).toContain('name')
    expect(keys).toContain('component')
    expect(keys).toContain('meta')

    expect(Object.keys(example.meta)).toHaveLength(1)
    expect(Object.keys(example.meta)).toContain('requireAuth')

    expect(example.meta.requireAuth).toBeFalsy()
    expect(example.path).toBe('/home')
    expect(example.name).toBe('Home')
    expect(typeof example.component).toBe('function')
  })

  it('Custom private route route', () => {
    const example = route({ path: '/home', name: 'Home', title: 'some title' }, 'Home')

    const keys = Object.keys(example)

    expect(keys).toHaveLength(5)
    expect(keys).toContain('path')
    expect(keys).toContain('name')
    expect(keys).toContain('title')
    expect(keys).toContain('component')
    expect(keys).toContain('meta')

    expect(Object.keys(example.meta)).toHaveLength(1)
    expect(Object.keys(example.meta)).toContain('requireAuth')

    expect(example.meta.requireAuth).toBeFalsy()
    expect(example.path).toBe('/home')
    expect(example.title).toBe('some title')
    expect(example.name).toBe('Home')
    expect(typeof example.component).toBe('function')
  })

  it('Custom meta values on private route route', () => {
    const example = route({ path: '/home', name: 'Home' }, 'Home', { someMetaValue: 42 })

    const keys = Object.keys(example)

    expect(keys).toHaveLength(5)
    expect(keys).toContain('path')
    expect(keys).toContain('name')
    expect(keys).toContain('component')
    expect(keys).toContain('meta')

    expect(Object.keys(example.meta)).toHaveLength(2)
    expect(Object.keys(example.meta)).toContain('requireAuth')
    expect(Object.keys(example.meta)).toContain('someMetaValue')

    expect(example.meta.requireAuth).toBeFalsy()
    expect(example.meta.requireAuth).toBe(42)
    expect(example.path).toBe('/home')
    expect(example.name).toBe('Home')
    expect(typeof example.component).toBe('function')
  })
})
